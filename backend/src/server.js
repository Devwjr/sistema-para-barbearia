import express from "express";
import cors from "cors";
import authRoutes from "./routes/auth.js";
import agendamentoRoutes from "./routes/agendamentos.js";

const app = express();
app.use(cors());
app.use(express.json());

app.use("/auth", authRoutes);
app.use("/agendamentos", agendamentoRoutes);

app.listen(5000, () => console.log("Backend rodando "));
