import sqlite3 from "sqlite3";
import { open } from "sqlite";

export const db = await open({
  filename: "./database.db",
  driver: sqlite3.Database
});

// Criação das tabelas
await db.exec(`
CREATE TABLE IF NOT EXISTS usuarios (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  nome TEXT,
  email TEXT UNIQUE,
  senha TEXT
);

CREATE TABLE IF NOT EXISTS agendamentos (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  usuario_id INTEGER,
  servico TEXT,
  data TEXT,
  FOREIGN KEY(usuario_id) REFERENCES usuarios(id)
);
`);
