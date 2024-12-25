import os; import json
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
print(translate_text('ab', " 'The :attribute field must contain at least one letter.',\n"))
print('ok')
print(translate_text('ab', " 'The :attribute field must contain at least one letter.',"))
print('ok')
