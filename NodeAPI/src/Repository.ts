import { Connection } from "mysql2";
import {connectToDatabase} from "./DBConnectie";
import User from "./types/User";


export async function findAll(): Promise<Array<User>> {
  const connection: Connection = await connectToDatabase();
  return new Promise((resolve, reject) => {
    connection.query('SELECT * FROM user', (error: Error, results: Array<User>) => { 
      if (error) reject(error);
      resolve(results);
    });
  })
}

export async function findById(id: Number): Promise<Array<User>> {
  const connection: Connection = await connectToDatabase();
  return new Promise((resolve, reject) => {
    connection.query(`SELECT * FROM user WHERE id = ${id}`, async (error: Error, results: Array<User>) => { 
      if (error) reject(error);
      resolve(results);
    })
  })
};

export async function remove(id: Number) {
  const connection = await connectToDatabase();
  connection.query(`DELETE FROM user WHERE id = ${id}`, (error: Error) => {
    if (error) throw error;
  })
};

export async function save(id: Number|null, user: User) {
  const connection = await connectToDatabase();
  if (id){
    connection.query(`UPDATE user SET first_name = "${user.firstName}", 
    last_name = "${user.lastName}", password = "${user.password}" WHERE id = ${id}`,  
    (error: Error) => {
      if (error) throw error;
    });
  }
  else {
    connection.query(`INSERT INTO  user (first_name, last_name, password) 
    VALUES ("${user.firstName}", "${user.lastName}", "${user.password}")`, (error: Error) => {
      if (error) throw error;
    });
  }
}