package org.example;

import org.example.User;
import org.springframework.data.jpa.repository.JpaRepository;

@SuppressWarnings("unused")
public interface Repository extends JpaRepository<User, Long>{

}
