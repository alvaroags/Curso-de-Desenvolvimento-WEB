import {db} from "../db.js"

export const getUsers = (_, res) => {
    const sql = "SELECT * FROM usuarios"

    db.query(sql, (err, result) => {
        if(err) return res.json(err);

        return res.status(200).json(result);
    });
};

export const addUser =  (req, res) => {
    const data = 
        "INSERT INTO usuarios (`nome`, `email`, `fone`, `dataNascimento`) VALUES (?)"

    const values = [
        req.body.nome,
        req.body.email,
        req.body.fone,
        req.body.dataNascimento
    ]

    db.query(data, [values], (err) => {
        if(err) return res.json(err);

        return res.status(200).json("Usuário adicionado com sucesso!")
    })
}

export const updateUser = (req, res) => {
    const data =
        "UPDATE usuarios SET nome = ?, email = ?, fone = ?, dataNascimento = ? WHERE id = ?"

    const values = [
        req.body.nome,
        req.body.email,
        req.body.fone,
        req.body.dataNascimento,
    ]

    db.query(data, [...values, req.params.id], (err) => {
        if(err) return res.json(err);

        return res.status(200).json("Usuário atualizado com sucesso!")
    })
}

export const deleteUser = (req, res) => {
    const data = "DELETE FROM usuarios WHERE id = ?"

    db.query(data, req.params.id, (err) => {
        if(err) return res.json(err);

        return res.status(200).json("Usuário deletado com sucesso!")
    })
}
