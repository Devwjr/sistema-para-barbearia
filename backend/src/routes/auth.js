import express from "express";
import { db } from "../db.js";
import bcrypt from "bcrypt";
import jwt from "jsonwebtoken";

const router = express.Router();
const SECRET = "segredo123"; 

router.post("/register", async (req, res) => {
  const { nome, email, senha } = req.body;
  const hashed = await bcrypt.hash(senha, 10);

  try {
    await db.run("INSERT INTO usuarios (nome,email,senha) VALUES (?,?,?)", [
      nome,
      email,
      hashed,
    ]);
    res.json({ message: "Usuário cadastrado!" });
  } catch (err) {
    res.status(400).json({ error: "Email já existe" });
  }
});

router.post("/login", async (req, res) => {
  const { email, senha } = req.body;
  const user = await db.get("SELECT * FROM usuarios WHERE email = ?", [email]);
  if (!user) return res.status(401).json({ error: "Credenciais inválidas" });

  const match = await bcrypt.compare(senha, user.senha);
  if (!match) return res.status(401).json({ error: "Credenciais inválidas" });

  const token = jwt.sign({ id: user.id }, SECRET, { expiresIn: "1h" });
  res.json({ token });
});

export default router;
