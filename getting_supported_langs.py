import os; import json
from google.cloud import translate
from dotenv import load_dotenv
from google.api_core.retry import Retry

def get_supported_languages(project_id: str = os.getenv("GOOGLE_CLOUD_PROJECT_ID"), 
							display_language_code: str = "pt"):
	"""Obtém uma lista de códigos de idiomas suportados e seus nomes no idioma especificado.

	Args:
		project_id: O ID do projeto do GCP.
		display_language_code: O código do idioma no qual os nomes dos idiomas serão exibidos.

	Returns:
		Uma lista de idiomas suportados com seus códigos e nomes.
	"""
	client = translate.TranslationServiceClient()
	parent = f"projects/{project_id}/locations/global"
	response = client.get_supported_languages(parent=parent, display_language_code=display_language_code)

	# for language in response.languages:
	#     print(f"Código da Língua: {language.language_code}, Nome da Língua: {language.display_name}")

	return response.languages

a1 = os.path.abspath(os.path.join(os.path.dirname(__file__), ".env"))
load_dotenv(dotenv_path=a1)
project = os.getenv("GOOGLE_CLOUD_PROJECT_ID")

a1 = os.path.abspath(os.path.join(os.path.dirname(__file__), "supported_languages.json"))
if not os.path.exists(a1) or os.path.getsize(a1) == 0:
	print('Getting supported languages...')
	languages = get_supported_languages(project, 'en')
	aux = []
	for i in range(len(languages)):
		lang_code = languages[i].language_code
		lang_name = languages[i].display_name
		target = languages[i].support_target
		aux += [{'language_code': lang_code, 'display_name': lang_name, 'support_target': target}]
	with open(a1, 'w', encoding='utf-8') as f: json.dump(aux, f, indent=4, ensure_ascii=False)
