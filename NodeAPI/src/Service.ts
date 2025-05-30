import { findAll, findById, remove, save } from "./Repository";
import User from "./types/User";

export async function getAllUsers(){
  return await findAll();
}

export async function getUserById(id: Number){
  return await findById(id);
}

export async function updateUser(id: Number, user: User){
  await save(id, user);
  return await findById(id);
}

export async function saveUser(user: User){
  await save(null, user);
  return findAll().then((users) => users.slice(-1));
}

export async function deleteUser(id: Number){
  await remove(id);
  return findAll();
}