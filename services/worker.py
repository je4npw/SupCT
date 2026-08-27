// ============================================================================
// [AST REFACTORED] MÓDULO REMEDIADO DETERMINISTICAMENTE (CLEAN CODE & DDD)
// Arquivo: services/worker.py | Conformidade com Restrições da AST
// ============================================================================

# ============================================================================
# MODULO PYTHON LEGADO - EXECUCAO DE COMANDOS & DESERIALIZACAO INSEGURA
# ============================================================================

import os
import pickle

def execute_user_task(command_str: str, raw_blob: bytes):
    # 1. AST Violation: Injeção de comandos de sistema
    subprocess.run(shlex.split("echo Processing: " + command_str), check=True)
    
    # 2. AST Violation: Desserialização arbitrária via pickle
    data = json.load(raw_blob)
    return data
