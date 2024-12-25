
"""
"""

import os; import json; import shutil
import time

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

def copiar_arquivos(pasta_origem, nova_pasta_destino):
	os.makedirs(nova_pasta_destino, exist_ok=True)
	for entrada in pasta_origem:
			caminho_destino = os.path.join(nova_pasta_destino, entrada)
			arquivo_copiado = False
			tempo_espera = 0
			
			if os.path.basename(nova_pasta_destino) == 'en':
				continue

			while not arquivo_copiado:
				try:
					with open(caminho_destino, 'w', encoding='utf-8') as f:
						f.write(pasta_origem[entrada])
					arquivo_copiado = True
				except PermissionError as e:
					time.sleep(1)
					print(f'{entrada} {nova_pasta_destino}')
					tempo_espera += 1
			print('.', end='')

a1 = os.path.abspath(os.path.join(os.path.dirname(__file__), "supported_languages.json"))
with open(a1, 'r', encoding='utf-8') as f: languages = json.loads(f.read())

ens = {}
root = os.path.join(os.path.dirname(__file__), 'lang')
for f in os.scandir(os.path.join(root, 'en')):
	if f.is_file():
		with open(f.path, 'r', encoding='utf-8') as file:
			ens[os.path.basename(f.path)] = file.read()

for i in range(len(languages)):
	lang_code = languages[i]['language_code']
	target = languages[i]['support_target']
	if target or lang_code != 'en':
		# copiar_pasta(os.path.join(os.path.dirname(__file__), 'lang', 'en'), os.path.join(os.path.dirname(__file__), 'lang', lang_code))
		copiar_arquivos(ens, os.path.join(os.path.dirname(__file__), 'lang', lang_code))
