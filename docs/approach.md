# Development Approach

The application will be built using a custom php library that is call Finity. 

The library is required in all the modules for database request and general function support. 

To use the library in your project you would include the file Autoloader.php from the Finity folder. see syntax below.
<!-- language: php -->
```php
<?php
    include "Finity/Autoloader.php";
?>
```
See [Documentation](finity.md) of library. 

## Task Assignment 

---
The user interface is divided into four(4) modules, below are the modules and there features. 

### Kimberly: Login UI

- [ ] setuping up of account 
- [ ] request password change
- [ ] login page
    
### Ruel: Admin Homepage UI
- [ ] create a user
- [ ] delete a user
- [ ] suspend a user
- [ ] reset password

### Tajhna: General User Homepage UI
- [ ] update user profile
- [ ] add new item to inventory
- [ ] update the inventory

### Ovel: Report Homepage UI 
- [ ] generate default report
- [ ] perform adhoc queries


