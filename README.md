# cancel_by_file
Cancel a php script by deleting a temporary file. 

# Example

Initiate and then check if the file is still there when you for each iteration.  
The class automatically removes the temporary file as soon as there are no other references to a particular object, or in any order during the shutdown sequence.

```php

$cancel = new cancel_by_file('example');

for($i=0;$i<10;$i++){
    
    $cancel->check();
    sleep(2);
    
}

```
