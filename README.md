# CS204 - Shopping website

A website that works like Shopee, but less complicated

## 💬 Overview

- The content of the website will be generated dynamically using **JavaScript, PHP, CSS, HTML**
- Homepage will contain of a navbar, list of products with their images and prices
- User can click into the product to see more specific details in a different page (brand, sellers, manufacturers, description, etc)
- In the product page, user can add comments and reviews under the description box
- Login, logout and create new account.
- Each user has a cart to store their products and quantity of each product.

## 🧸Folder constructor

- **Final project**
    - index.php
    - .htaccess
    - **includes:**
        - header.php
        - footer.php
        - style.css
    - **views**
        - _404.php
        - home.php
        - login.php
        - product.php
        - contact.php
        - _403.php
    - **images : ***store product images*
    - **controllers**
        - Controller.php
        - HomeController.php
        - ProductController.php
        - UserController.php
    - **models**
        - Product.php
        - User.php
    - **core**
        - DB.php
        - Router.php
        - web.php
    - **middleware (chưa biết có cần hay không)**
        - CSRF.php
