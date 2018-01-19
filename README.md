# Shopify App with PHP

**Part 1: Shopify**
1. Create a store on **Shopify Partner** account

2. Setup the development store (admin configuration, products, data etc.).We suggest to install **"Developer Tool"** from store admin to configure the dummy data.
   - https://developer-tools.shopifyapps.com/install
   
3. Now create a new **"App"** from Partner account to get "API_KEY" & "API_SECRET". Provide the Name & Redirec URL of your app. (configure as per your App)
   - App Name:           
   **[Your-app-name]**
   
   - App URL:   
   http://localhost/ **[your-app-dir]**
   
   - App Redirection URL:
   
   http://localhost/ **[your-app-dir]**/login.php
   
   
   
**Part 2: Server Side (PHP)**
1. Clone this repository and install the require dependencies by using the following command:

   "**composer require twig/twig guzzlehttp/guzzle nesbot/carbon vlucas/phpdotenv ircmaxell/random-lib**"
   
2. Create a new **database** and import the script provided in "**db**" directory.

3. Now configure the **.env** file as per requirement

   MYSQL_HOST=DB_HOST<br/>
   MYSQL_DB=DB_NAME<br/>
   MYSQL_USER=YOUR_DB_USER<br/>
   MYSQL_PASS=YOUR_DB_PASSWORD<br/>
   SHOPIFY_APIKEY="YOUR SHOPIFY APP API KEY"<br/>
   SHOPIFY_SECRET="YOUR SHOPIFY APP SECRET"<br/>
   SHOPIFY_SCOPES="read_products,read_customers"<br/>
   SHOPIFY_REDIRECT_URI="http://localhost/ **[your-app-dir]** /login.php"<br/>
   
4. Browse the **install** url directly (if app is not listed on Shopify Apps store). It will ask for store url on which you want to install the app.
   - http://localhost/ **[your-app-dir]** /install.php


