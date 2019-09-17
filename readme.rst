Endpoint:

http://apocryphe.com.mx/zipdev-test/get  GET DATA
http://apocryphe.com.mx/zipdev-test/insert/ POST DATA
http://apocryphe.com.mx/zipdev-test/update/ POST DATA
http://apocryphe.com.mx/zipdev-test/delete/ POST DATA
http://apocryphe.com.mx/zipdev-test/filter/:row/:value GET DATA


All endpoints woks using postaman sending a form data type and get, return a json decoded.

Filter endpoint example:

http://apocryphe.com.mx/zipdev-test/filter/surname/ok

I provide too , the sql db file.


Insert parameters and name:

firstname:str
surname:str
phones: str, strN. (each phone will be separated with comma)
email: str, strN. (each email will be separated with comma)


Delete:

id:int 

Update: 

firstname:str
surname:str
phones: str, strN. (each phone will be separated with comma)
email: str, strN. (each email will be separated with comma)
