## This project is about using a Regular Expression to find word pattern in PHP.

## GitHub Page URL:

https://github.com/chanchailee/RegularExpression101

https://chanchailee.github.io/RegularExpression101

## Medium Article:
https://medium.com/@leechanchai/regular-expression-cbb28e76c8b8

## To run this program:
    Without input file:
    php regexCS.php

    With sample html example :
    php regexCS.php sample.html


## RegEx Guide:
    RegEx in PHP should start with "/" and end with "/"

      Ex: /A/,
          /\d/,
          /(pattern1|pattern2)/,
          /([a-z]|[A-Z])/,
          /([0-9])/


## Examples Pattern:
    /R\d{1,}/
      Matches String Contain R and follow by 1 digit or more
    /\d{1}/
      Matches Exactly 1 digit.
    /\d{1,3}/
      Matches between 1 digit to 3 digits.
    /\w{1}/
      Matches Exactly 1 word (or character)
    /\w{3,5}/
      Matches between 3 characters to 5 characters.
    /\D/
      Matches NON-digit character
    /\W/
      Matches NON-word character
    /[a-zA-Z]/
      Matches any characters between a-z or A-Z.
    /[a-zA-Z]{3}/
      Matches 3 consecutive characters between a-z or A-Z.

## Function Explanation:

### preg_match($pattern, $str, $matches, PREG_OFFSET_CAPTURE)

    This function is used to find a particular pattern by using regex.

    return 0 or 1; 1 means found the word from a given pattern.


    $pattern =  Regular Expression pattern
      EX: /^B\d{0,}/ = the word start with B follows by 0 or more digit(s),
          /\d{1}/ = the word contain exactly one digit.

    $str = input string.

    $matches = array that uses to store result from regular expression.

    PREG_OFFSET_CAPTURE =  the parameter that triggers preg_match function to store index of character that match with regex pattern inside $matches array.


### preg_replace($pattern, $replacement, $str)

    This function is used to replace a particular pattern by using regex.

    $pattern =  RegEx word pattern.

    $replacement =  The replacement word.

    $str =  input string.

## Examples:
    $str = "I am Summer. Everybody called me Summer.";

    if(preg_match("/Summer/",$str,$array)){
      print ("input: ".$str."\n");
      print ("output: ");
      print_r($array);
      print "\n";
    }

    It will find any word that matches with a given pattern("/Summer/") $str.

    if(preg_match("/Su(mm)er/",$str,$array)){
      print ("input: ".$str."\n");
      print ("output: ");
      print_r($array);
      print "\n";
    }

    It will find any word that matches with a given pattern("/Su(mm)er/") $str. Also, it will find a group of word inside parentheses (mm) and store in and $array object.

## References:
    https://regex101.com

    https://www.youtube.com/watch?v=In5NBIRfMrQ

    https://www.youtube.com/watch?v=sa-TUpSx1JA&t

    https://www.youtube.com/watch?v=wnu4febXKx0

## cheatsheet PNG url:
http://clevertechie.com/files/regex-cheat-sheet.png  

![alt text](http://clevertechie.com/files/regex-cheat-sheet.png)
