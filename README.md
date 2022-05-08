# Step to run project

* git clone https://github.com/abozaidmahmoud/DataProvider.git
* open terminal
* cd project-path
* Run composer install
* Run php -S localhost:8000 -t public
* open postman and call endpoint :: http://localhost:8000/api/v1/transactaions
## METHOD:: GET AND this is optional parameters
    - provider = DataProviderX
    - currency = EGY
    - statusCode = paid
    - amountMin = 100
    - amountMax = 500

## Step to add new DataProvider like (DataProviderZ)
- in directory app/DataProvider we add DataProviderZ.json

- in directory app/TransactionFormat add file DataProviderZ.php and set implement function StatusCode
for transactions for this provider.



##Enviornment

-PHP-V :8.0

-lumen-V :9.0
