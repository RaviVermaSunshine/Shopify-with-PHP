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
   
   
**Part 2: Server Side (with PHP)**
1. Clone this repository and install the require dependencies by using the following command:

   "**composer require twig/twig guzzlehttp/guzzle nesbot/carbon vlucas/phpdotenv ircmaxell/random-lib**"


