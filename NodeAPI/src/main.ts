import { getAllUsers, getUserById, saveUser, updateUser, deleteUser } from "./Service";
import User from "./types/User";

(async () => {

  const express = require("express");
  const app = express();
  const port = 8080;

  app.use(express.raw({ type: '*/*', limit: '10mb' }));

  app.listen(port, () => {
    console.log(`Server is running on http://localhost:${port}`);
  });

  app.route('/api/users')
    .get(async (req: any, res: any) => {
      res.send(await getAllUsers());
    })
    .post(async (req: any, res: any) => {
      const body = JSON.parse(req.body);
      const user: User = {
        firstName: body.firstName,
        lastName: body.lastName,
        password: body.password
      };
      res.send(await saveUser(user));
    });

  app.route('/api/users/:id')
    .get(async (req: any, res: any) => {
      const id = req.params.id;
      res.send(await getUserById(id));
    })
    .put(async (req: any, res: any) => {
      const body = JSON.parse(req.body);
      const id = req.params.id;
      const user: User = {
        firstName: body.firstName,
        lastName: body.lastName,
        password: body.password
      };
      res.send(await updateUser(id, user));
    })
    .delete(async (req: any, res: any) => {
      const id = req.params.id;
      res.send(await deleteUser(id));
    });
})();

