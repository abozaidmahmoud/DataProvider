# Step tO run project

* git clone https://github.com/abozaidmahmoud/DataProvider.git
* cd project-path
* php -S localhost:8000 -t public
* open postman and call endpoint :: http://localhost:8000/api/v1/transactaions
   ## METHOD:: GET AND this is optional parameters
    - provider = DataProviderX
    - currency = EGY
    - statusCode = paid
    - amountMin = 100
    - amountMax = 500

