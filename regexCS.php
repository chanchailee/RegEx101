<?php
/*

  To run this program: php regexCS.php
  References:
    regex101.com
    https://www.youtube.com/watch?v=In5NBIRfMrQ
    https://www.youtube.com/watch?v=sa-TUpSx1JA&t
    https://www.youtube.com/watch?v=wnu4febXKx0

  cheatsheet pdf url:
  http://clevertechie.com/files/regex-cheat-sheet.png


*/
$filename = $argv[1];

if($filename == null|| $filename == ""){

    $str = "I am Summer. Everybody called me Summer. Susan is my girlfriend and she lives in Sunnyvale.";

    $pattern = "/S\w{1,}\s*/";
    if(preg_match($pattern,$str,$array)){
      print ("input: ".$str."\n");
      print ("output: ");
      print_r($array);
      print "\n";
    }

    if(preg_match_all($pattern,$str,$array)){
      print ("input: ".$str."\n");
      print ("output: ");
      print_r($array);
      print "\n";
    }



    /*With Parentheses (Grouping) */
    if(preg_match("/Su(mm)er/",$str,$array)){
      print ("input: ".$str."\n");
      print ("output: ");
      print_r($array);
      print "\n";
    }

    /*matchs all word with the same pattern in a string*/
    if(preg_match_all("/Summer/",$str,$array)){
      print ("input: ".$str."\n");
      print ("output: ");
      print_r($array);
      print "\n";
    }

    if(preg_match_all("/S(umme)r/",$str,$array)){
      print ("input: ".$str."\n");
      print ("output: ");
      print_r($array);
      print "\n";
    }

    /* Replace a particular word with another word*/
    $string2 = preg_replace("/Summer/","Jack",$str);
    print ("input: ".$str."\n");
    print ("Replace string output: ");
    echo $string2."\n";


    /*
    RegEx Guide:
    RegEx in PHP should start with / and end with /
     Ex: /A/, /\d/, /(pattern1|pattern2)/


    Examples Pattern:
    /R\d{1,}/ -> Matched String Contain R and follow by 1 digit or more
    /\d{1}/-> Matched Exactly 1 digit.
    /\d{1,3}/ -> Matched between 1 digit to 3 digits.
    /\w{1}/-> Matched Exactly 1 word (or character)
    /\w{3,5}/ -> Matched between 3 characters to 5 characters.
    /\D/ -> Match NON-digit character
    /\W/-> Matched NON-word character
    /[a-zA-Z]/
      Matches any characters between a-z or A-Z.

    Function Explanation:

    preg_match($pattern, $str, $matches, PREG_OFFSET_CAPTURE)
      This function is used to find a particular pattern by using regex.
      return 0 or 1; 1 means found the word from a given pattern.
      $pattern =  Regular Expression pattern
        EX: /^B\d{0,}/ = the word start with B follows by 0 or more digit(s),
            /\d{1}/ = the word contain exactly one digit.
      $str = input string.
      $matches = array that uses to store result from regular expression.
      PREG_OFFSET_CAPTURE =  the parameter that triggers preg_match function to store index of character that match with regex pattern inside $matches array.

    preg_replace($pattern, $replacement, $str)
      This function is used to replace a particular pattern by using regex.

      $pattern =  RegEx word pattern.
      $replacement =  The replacement word.
      $str =  input string.
    */

    function operate($str){

      /*Replace -number with ''*/
      $pattern = '/-\d{1,}/';
      $replacement = '';
      $str= preg_replace($pattern, $replacement, $str);
      /**/

      while (strlen($str)!=0){
        switch ($str){
          case (preg_match("/^W\d{0,}/", $str, $matches, PREG_OFFSET_CAPTURE) ? true : false) :
            print("matches: "."/^W\d{0,}/"." pattern\n");
            print("W follow by 0 or more digit(s)pattern matches\n");
            print ("output: ".$matches[0][0] ."\n\n");
            break;

          case (preg_match("/^B\d{0,}/", $str, $matches, PREG_OFFSET_CAPTURE) ? true : false) :
          print("matches: "."/^B\d{0,}/"." pattern\n");
          print("B follow by 0 or more digit(s)pattern matches\n");
          print ("output: ".$matches[0][0] ."\n\n");
            break;

          case (preg_match("/^R\d{0,}/", $str, $matches, PREG_OFFSET_CAPTURE) ? true : false) :
          print("matches: "."/^R\d{0,}/"." pattern\n");
          print("R follow by 0 or more digit(s)pattern matches\n");
          print ("output: ".$matches[0][0] ."\n\n");
            break;

          case (preg_match("/^L\d{0,}/", $str, $matches, PREG_OFFSET_CAPTURE) ? true : false) :
          print("matches: "."/^L\d{0,}/"." pattern\n");
          print("L follow by 0 or more digit(s)pattern matches\n");
          print ("output: ".$matches[0][0] ."\n\n");
            break;

          default:
            exit ("Error:Invalid Format!!\n");
        }

        $offset = $matches[0][1];
        $length = strlen($matches[0][0]);
        $str = substr($str,$offset+$length);

      }

    }
    $input = "W-17WW111WBR-20RRLL2RLBB-88BBB3B9BWR1111L-30L15R7";

    print("\n\n\n\nInput: ".$input."\n\n");
    operate($input);

  }

  else{
    /*HTML Section*/
      print ("\n\nRegEx: HTML file sample\n____________________________\n");
      $file = fopen($filename,"r");
      $i=1;
      while(! feof($file)){
        print ("Line $i:\n");
        $line = fgets($file);
        print (trim($line)."\n\n");
        print("Replace HTML output Line ".$i." :\n");
        replaceHtmlTag(trim($line));
        print("\n\n");
        findHtmlTag(trim($line));
        print("____________________________________________\n");

        $i++;
      }
      fclose($file);
  }


  function replaceHtmlTag($str){
    $lazy_pattern = "/<([^>]*)>/";
    print(preg_replace($lazy_pattern, $replacement, $str));
  }
  function findHtmlTag($str){
      $lazy_pattern = "/<([^>]*)>/";
      if(preg_match($lazy_pattern,$str,$array)){
        print_r($array);
        print("\nHtml Tag:".$array[0]."\n");
      }
  }
?>
