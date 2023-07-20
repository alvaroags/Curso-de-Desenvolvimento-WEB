import React, {useEffect, useRef} from 'react'
import styled from 'styled-components'
import axios from 'axios'
import { toast } from 'react-toastify'

const FormContainer = styled.form`
    display: flex;
    align-items: flex-end;
    gap: 10px;
    flex-wrap: wrap;
    background-color: #fff;
    padding: 20px;
    box-shadow: 0px 0px 5px #ccc;
    border-radius: 5px;
`

const InputArea = styled.div`
    display: flex;
    flex-direction: column;
`

const Input = styled.input`
    width: 120px;
    padding: 0 10px;
    border: 1px solid #bbb;
    border-radius: 5px;
    height: 40px;
`

const Label = styled.label``

const Button = styled.button`
    padding: 10px;
    cursor: pointer;
    border: none;
    border-radius: 5px;
    background-color: #2c73d2;
    color: #fff;
    height: 42px;
`

const Form = ({onEdit,setOnEdit, getUsers}) => {
    const ref = useRef()

    useEffect(() => {
        if(onEdit){
            const user = ref.current

            user.nome.value = onEdit.nome
            user.email.value = onEdit.email
            user.fone.value = onEdit.fone
            user.dataNascimento.value = onEdit.dataNascimento

        }
    }, [onEdit])

    const handleSubmit = async (e) => {
        e.preventDefault()

        const user = ref.current

        if (
            !user.nome.value ||
            !user.email.value ||
            !user.fone.value ||
            !user.dataNascimento.value
        ) {
            return toast.warn("Preencha todos os campos!")
        }

        if(onEdit){
            await axios
            .put("http://localhost:8800/" + onEdit.id, {
                nome: user.nome.value,
                email: user.email.value,
                fone: user.fone.value,
                dataNascimento: user.dataNascimento.value
            })
            .then(({data}) => toast.success(data))
            .catch(({data}) => toast.error(data))
        } else {
            await axios.post('http://localhost:8800', {
                nome: user.nome.value,
                email: user.email.value,
                fone: user.fone.value,
                dataNascimento: user.dataNascimento.value
            })
            .then(({data}) => toast.success(data))
            .catch(({data}) => toast.error(data))
        }

        user.nome.value = ''
        user.email.value = ''
        user.fone.value = ''
        user.dataNascimento.value = ''

        setOnEdit(null)
        getUsers()
    }


    return (
        <FormContainer ref={ref} onSubmit={handleSubmit} >
            <InputArea>
                <Label>Nome</Label>
                <Input type="text" name='nome' />
            </InputArea>
            <InputArea>
                <Label>Email</Label>
                <Input type="email" name='email' />
            </InputArea>
            <InputArea>
                <Label>Fone</Label>
                <Input type="text" name='fone' />
            </InputArea>
            <InputArea>
                <Label>Data de Nascimento</Label>
                <Input type="date" name='dataNascimento' />
            </InputArea>

            <Button type="submit">Salvar</Button>
        </FormContainer>
    )
}

export default Form