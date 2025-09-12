import express from "express";
import { db } from "../db.js";

const router = express.Router();

router.get("/", async (req, res) => {
  const agendamentos = await db.all("SELECT * FROM agendamentos");
  res.json(agendamentos);
});

router.post("/", async (req, res) => {
  const { usuario_id, servico, data } = req.body;
  await db.run(
    "INSERT INTO agendamentos (usuario_id, servico, data) VALUES (?,?,?)",
    [usuario_id, servico, data]
  );
  res.json({ message: "Agendamento criado!" });
});

export default router;
