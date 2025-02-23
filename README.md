# MikroTik PHP API Class

A PHP class for managing MikroTik users via API. This package allows you to add, remove, and update users, monitor their status (online/offline), and manage their bandwidth and packages on MikroTik routers. It simplifies integration with MikroTik routers and helps automate the process of user management in an ISP billing system.

## Features

- **User Management**: Add, remove, or update users on MikroTik routers.
- **Bandwidth Management**: Monitor and manage user bandwidth and speed limits.
- **Online/Offline Monitoring**: Check user status (online or offline).
- **API Integration**: Easy integration with MikroTik routers via their API.

## Installation

To install the package, you can use Composer:

```bash
composer require rakibas375/mikrotik-php

<?php

require 'vendor/autoload.php';

use Rakib\Mikrotik\MikrotikAPI;

// Create an instance of the class
$mk = new MikrotikAPI();

// Add a user to MikroTik router
$userInfo = [
    'username' => 'newuser',       // The username for the new user
    'password' => 'password123',   // The password for the new user
    'profile'  => 'default',       // The profile to assign the user (e.g., bandwidth profile)
    'routerIp' => '192.168.88.1',  // The IP address of the MikroTik router
];

// Add the user and get the response from MikroTik
$response = $mk->user_add($userInfo);

// Print the response from MikroTik API (success or error message)
echo $response;

 Methods
user_add($userInfo)
This method is used to add a new user to the MikroTik router.

Parameters:
$userInfo (array): An associative array containing user details such as username, password, and profile.
$userInfo = [
    'username' => 'newuser',
    'password' => 'password123',
    'profile'  => 'default',
    'routerIp' => '192.168.88.1',
];
$mk->user_add($userInfo);


get_all_online_users()
This method retrieves all users who are currently online.
$onlineUsers = $mk->get_all_online_users();
echo "Currently online users: " . implode(', ', $onlineUsers);


get_all_offline_users()
This method retrieves all users who are currently offline.
$offlineUsers = $mk->get_all_offline_users();
echo "Currently offline users: " . implode(', ', $offlineUsers);
