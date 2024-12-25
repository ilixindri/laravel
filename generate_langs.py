import os; import json; import glob
from google.cloud import translate
from dotenv import load_dotenv
from google.api_core.retry import Retry

def translate_text(target: str = '',
	text: str = "YOUR_TEXT_TO_TRANSLATE"):
	"""Translating Text."""
	if text == '':
		print('texto para tradução vazio')

	client = translate.TranslationServiceClient()

	location = "global"

	project_id = os.getenv("GOOGLE_CLOUD_PROJECT_ID")
	parent = f"projects/{project_id}/locations/{location}"

	a2 = 2*(10**9)
	retry = Retry(initial=a2)
	response = client.translate_text(
		parent=parent,
		contents=[text],
		mime_type="text/plain",  # mime types: text/plain, text/html
		target_language_code=target,
		retry=retry,
		timeout=a2
	)
	return response.translations[0].translated_text

a1 = os.path.abspath(os.path.join(os.path.dirname(__file__), ".env"))
load_dotenv(dotenv_path=a1)

a1 = os.path.abspath(os.path.join(os.path.dirname(__file__), 'supported_languages.json'))
with open(a1, 'r', encoding='utf-8') as f: languages = json.loads(f.read())

ens = {}
root = os.path.join(os.path.dirname(__file__), 'lang')
for f in os.scandir(os.path.join(root, 'en')):
	if f.is_file():
		with open(f.path, 'r', encoding='utf-8') as file:
			ens[os.path.basename(f.path)] = file.read().split('\n')

for lang in languages:
	lang_code = lang['language_code']
	lang_name = lang['display_name']
	target = lang['support_target']
	if target:
		for f in os.scandir(root):
			if f.is_dir():
				for g in os.scandir(os.path.join(root, f.path)):
					if g.is_file():
						content = ''
						with open(g.path, 'r', encoding='utf-8') as file:
							for line in file:
								if line not in ens[os.path.basename(g.path)]:
									continue
								a99 = line.split('=>')
								if len(a99) not in [1, 2]:
									print(f'error, 01, {g.path}')
									exit()
								aux = line
								if a99[-1] != '[' or len(a99) != 1:
									aux = a99[0] + '=>' + translate_text(lang_code, a99[1])
								content += aux
						with open(g.path, 'w', encoding='utf-8') as file:
							file.write(content)
