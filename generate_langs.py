
"""
traduzir os arquivos default de langs

pesquisar por regex __('texto') e popular os arquivos lang

ao pegar o texto do regex verificar qual a lang
pois vou começar a escrever em pt e fazer
o replace por en caso precise
por exemplo deixar publico o codigo

primeiros 500k de caracteres por mes free
"""

import os; import json; import glob
from google.cloud import translate
from dotenv import load_dotenv
from google.api_core.retry import Retry

CARACTERES_TRADUZIDOS = 0

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
quantidade_de_lang = len(languages)

ens = {}
root = os.path.join(os.path.dirname(__file__), 'lang')
for f in os.scandir(os.path.join(root, 'en')):
	if f.is_file():
		with open(f.path, 'r', encoding='utf-8') as file:
			ens[f.name] = file.read()

for numero_lang, lang in enumerate(languages, start=1):
	lang_code = lang['language_code']
	lang_name = lang['display_name']
	target = lang['support_target']
	if target:
		for subpasta in os.scandir(root):
			print(subpasta.path)
			if subpasta.is_dir():
				if subpasta.name in ['en']:
					continue
				for file in os.scandir(os.path.join(root, subpasta.path)):
					print(file.path)
					if file.is_file():
						if CARACTERES_TRADUZIDOS > 300000:
							exit()
						content = ''
						number = 0
						with open(file.path, 'r', encoding='utf-8') as f:
							number = len(f.read().split('\n'))
						with open(file.path, 'r', encoding='utf-8') as f:
							for numero_linha, line in enumerate(f, start=1):
								print(f'{numero_linha}/{number} de {numero_lang}/{quantidade_de_lang}')
								if line.strip() not in ens[g.name]:
									content += line
									continue
								a99 = line.split('=>')
								if len(a99) not in [1, 2]:
									print(f'error, 01, {g.path}')
									exit()
								aux = line
								if a99[-1] != '[' and len(a99) != 1:
									print('Traduzindo:', a99[1].strip())
									CARACTERES_TRADUZIDOS += len(a99[1])
									aux = a99[0] + '=>' + translate_text(lang_code, a99[1])
								content += aux
						with open(g.path, 'w', encoding='utf-8') as f:
							f.write(content)
							f.flush()
							os.fsync(f.fileno())
