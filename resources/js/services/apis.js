import axios from 'axios'
export async function obtenerUsuarios() {
  const response = await axios.get('/usuarios.json')
  return response.data
}

const BASE_URL = 'http://127.0.0.1:8000/api/bd';

// Listar todos
export const getUsuarios = async () => {
  //metodo get
    const res = await fetch(`${BASE_URL}/usuario`)
    return await res.json()
}

// Ver uno por ID
export const getUsuario = async (id) => {
  //metodo get
    const res = await fetch(`${BASE_URL}/usuario/${id}`)
    return await res.json()
}

// Crear
export const createUsuario = async (data) => {
    const res = await fetch(`${BASE_URL}/usuario`, {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(data)
    })
    return await res.json()
}

// Actualizar
export const updateUsuario = async (id, data) => {
    const res = await fetch(`${BASE_URL}/usuario/${id}`, {
        method: 'PUT',
        headers: { 'Content-Type': 'application/json','Accept': 'application/json', },
        body: JSON.stringify(data)
    })
    return await res.json()
}

// Eliminar
export const deleteUsuario = async (id) => {
    const res = await fetch(`${BASE_URL}/usuario/${id}`, {
        method: 'DELETE',
    })
    return await res.json()
}
