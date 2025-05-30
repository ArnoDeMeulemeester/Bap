package org.example;

import org.example.User;
import org.example.Repository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import java.util.List;
import java.util.Optional;

@SuppressWarnings("unused")
@Service
public class ServiceImplementation implements org.example.Service {

    private final Repository REPOSITORY;

    @Autowired
    public ServiceImplementation(Repository repository) {
        this.REPOSITORY = repository;
    }

    @Override
    public User getUserById(Long id) {
        Optional<User> optionalUser = REPOSITORY.findById(id);
        return optionalUser.orElse(null);
    }

    @Override
    public void saveUser(User user) {
        REPOSITORY.save(user);
    }

    @Override
    public User updateUser(Long id, User user) {
            return REPOSITORY.findById(id).map(existingUser -> {
                existingUser.setFirstName(user.getFirstName());
                existingUser.setLastName(user.getLastName());
                existingUser.setPassword(user.getPassword());
                return REPOSITORY.save(existingUser);
            }).orElse(null);
    }

    @Override
    public void deleteUser(Long id) {
        REPOSITORY.deleteById(id);
    }

    public List<User> getAllUsers() {
        return REPOSITORY.findAll();
    }
}
