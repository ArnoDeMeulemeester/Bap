package org.example;

import org.example.User;
import org.example.Service;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.*;

import java.util.List;

@SuppressWarnings("unused")
@RestController
@RequestMapping("/api/users")
public class Controller {
    private final Service SERVICE;

    @Autowired
    public Controller(Service service) {
        this.SERVICE = service;
    }

    @GetMapping("/{id}")
    public User getUserById(@PathVariable("id") Long id) {
        return SERVICE.getUserById(id);
    }

    @GetMapping
    public List<User> getAllUsers() {
        return SERVICE.getAllUsers();
    }

    @PostMapping
    public void addUser(@RequestBody User user) {
        SERVICE.saveUser(user);
    }

    @PutMapping("/{id}")
    public User updateUser(@PathVariable("id") Long id, @RequestBody User user) {
        return SERVICE.updateUser(id, user);
    }

    @DeleteMapping("/{id}")
    public void deleteUser(@PathVariable("id") Long id) {
        SERVICE.deleteUser(id);
    }
}
