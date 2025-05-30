import mysql, {Connection} from 'mysql2';

const connection = mysql.createConnection({
  host: 'localhost',
  user: 'root',
  password: `qM%z%f3EAbiK@%ua`,
  database: 'users'
});

export const connectToDatabase = (): Promise<Connection> => {
  return new Promise((resolve, reject) => {
    connection.connect((error) => {
      if (error) reject(error);
      else {
        resolve(connection);
      }      
    });
  });
};
