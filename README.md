# cancel_by_file
Cancel a php script by deleting a temporary file. 

# Example

```php

$cancel = new cancel_by_file('example');

for($i=0;$i<10;$i++){
    
    $cancel->check(); // check if file still exisits, if not, exit
    sleep(2);
    
}

```

The class automatically removes the temporary file as soon as there are no other references to the cancel_by_file object.
