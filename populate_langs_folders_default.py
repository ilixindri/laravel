
"""
"""

import os; import json; import shutil

def copiar_pasta(origem, destino):
    """Copia uma pasta inteira da origem para o destino.

    Args:
        origem: O caminho da pasta de origem.
        destino: O caminho da pasta de destino.
    """
    try:
        shutil.copytree(origem, destino)
        print(f"Pasta copiada de '{origem}' para '{destino}' com sucesso.")
    except FileExistsError:
        print(f"Erro: A pasta de destino '{destino}' já existe.")
    except Exception as e:
        print(f"Ocorreu um erro durante a cópia: {e}")

a1 = os.path.abspath(os.path.join(os.path.dirname(__file__), "supported_languages.json"))
with open(a1, 'r', encoding='utf-8') as f: languages = json.loads(f.read())

for i in range(len(languages)):
	lang_code = languages[i]['language_code']
	target = languages[i]['support_target']
	if target:
		copiar_pasta(os.path.dirname(__file__) + '/en', os.path.dirname(__file__) + '/' + lang_code)
