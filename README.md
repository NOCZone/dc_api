NOC Zone DC-API
======

This API gives you the ability to add, edit, disable, enable or delete server slots for other members of NOCZone

(edit/delete/disable/enable/notify can work only for servers you added)


When using DC-API you will be able to create a server slot and send it to a NOC Zone member via email, You might wish to add server monitoring service for your customers, or just resell server slots.



**** Request result samples :****


Result for add request

````
{
    "result":1,
  "error_code":0,
  "msg":"",
  "data":{
    "take_over":"740ad945c22cb89584b06f6466467860",
    "take_over_url":"https:\/\/noczone.com\/?page=take_over&id=740ad945c22cb89584b06f6466467860"
  }
}
````
----

Result for a delete    request:
````
{
  "result":1,
  "error_code":0,
  "msg":"",
  "data":{
    "servers_handover":0,
    "servers_users":0,
    "servers_deleted":1,
    "servers_total":1,
    "servers_requested":2,
    "users_notified_success":0,
    "users_notified_failed":0
  }
}
````

---

Resut for edit request:

````
{"result":1,"error_code":0,"msg":"","data":[]}
````
---

Result for disable request:
````
{
  "result":1,
  "error_code":0,
  "msg":"",
  "data":{
    "servers_users":1,
    "servers_total":1,
    "servers_requested":2,
    "users_notified_success":1,
    "users_notified_failed":0
  }
}
````
---
Result for enable request:
````
{
  "result":1,
  "error_code":0,
  "msg":"",
  "data":{
    "servers_users":1,
    "servers_total":1,
    "servers_requested":2,v     "users_notified_success":1,v     "users_notified_failed":0
  }
}
````




