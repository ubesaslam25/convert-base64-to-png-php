<?php 
    /* Base64 image code */
    $data = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAV4AAACWBAMAAABkyf1EAAAAG1BMVEXMzMyWlpacnJyqqqrFxcWxsbGjo6O3t7e+vr6He3KoAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAEcElEQVR4nO2aTW/bRhCGh18ij1zKknMkbbf2UXITIEeyMhIfRaF1exQLA/JRclslRykO+rs7s7s0VwytNmhJtsA8gHZEcox9PTs7uysQgGEYhmEYhmEYhmEYhmEYhmEYhmEYhmEYhmEYhmEYhmGYr2OWRK/ReIKI8Zt7Hb19wTcQ0uTkGh13bQupcw7gPOvdo12/5CzNtNR7xLUtNtT3CGBQ6g3InjY720pvofUec22LJPr8PhEp2OMPyI40PdwWUdronCu9yQpdPx53bQlfLKnfOVhlnDYRBXve4Ov+IZTeMgdedm0NR+xoXJeQvdJ3CvziykSukwil16W/Oe7aGjIjqc/9ib4jQlJy0uArtN4A0+cvXFvDkmUJ47sJ1Y1ATLDNVXZkNPIepQzxy1ki9fqiwbUj/I+64zxWNzyZnPuhvohJ9K70VvXBixpcu2SAHU+Xd9EKdEJDNpYP3AQr3bQSpPQ6Y6/4dl1z7ZDbArsszjA7L0g7ibB0CDcidUWVoErvIMKZh2Xs0LUzcLW6V5NfiUgNEbaYmAVL6bXl0nJRc+1S72ua/D/cTjGPlQj7eUqd7A096rYlRjdPYlhz7VIvxpVG3cemDKF+WAwLY/6XelOZKTXXzsC4xvDjjtSN6kHLhLke6PrwM8h1raf40qjrGO7H9aTEbduucjS04ZrYU/4iuS5Z2Hdt0rvCLFdmLEXcU30AGddST62o+sLcf5l6k7CP+ru4pLYqX/VFyxbm/utQbx/r22ZEbTb2f5I2kns1Y1OQR8ZyofX+TjJxj1Rz7QQVnf1QzR26Oth0ueJVYcRP6ZUPac/Rx/5M6ixO1dhSrT3Y1DpiYmx3tF4ZUdpz9LD/dSg9PXES0LB71BwcGjKROuV28lnvnv7HHJsezheBGH5+X2CfSfRbMKW+5aGs3JFjMrjGibJc0S7TJzqjHrh2hDybj9XRXNZa89Aro55XBdbW5wti2c/5WJ7jJ1RolVUn/HWpb0I58Tziup6Rx7Dm2hnbRP1GM9PW/NFmQ4PtVRVN63Wvxfmu5sowDMMwDMMwDMMwDMMwDMMwDMMwzL+CpT//F/6beoV8zb2Jmt4Qryx6lTUCsENQ75HOkhXAO3EPVgyQtKtUy3C/e+FJg17Zjnew1Xrdb9InbG4WqfUAftG+WhLwPVyfg536+MU7m4C1CMk4ZznpXZzDYI1PDL2nS1hpvc5cNd7E2sJg05Fe7/7d3Fln8Cvc3bwB616auxsKl4WPghjemHrDqyDWeu1UNW5s2btPnSQ75oOdunEwWazfwgVG0kqluYCM9OIjWOGnfA2b9G4Ha63XKpvQ8perTvTifJNhi6+WMWmi7smEZf6G8MmhlyGq+NqP8GV84TLuJr7UIQVx+bDEoEpRZIz42gs40OuN4Mv8hXzelV7KX1isH+ewTWckikyVv+CfHuqVF7I16gN0VKypX6wPsE+zFPzkinolU9UH8OMGvSpnZqKsv13p/RsMun6X5x/y2LeAr8O66lsBwzBMP/wJfyGq8pgBk6IAAAAASUVORK5CYII=";
 
    function convertBase64ToImage($base64Code, $path, $imageName = null){
        if (!empty($base64Code) && !empty($path)) :
            // split the string to get extension and remove not required part
            // $stringPieces[0] = to get image extension
            // $stringPieces[1] = actual string to convert into image
            $stringPieces = explode(";base64,", $base64Code);
            /* Get type of image ex. png, jpg, etc. */
            // $imageType[1] will return type
            $imageTypePieces = explode("image/", $stringPieces[0]);
            $imageType = $imageTypePieces[1];
            /* Create full path with image name and extension */
            $storeAt = $path.md5(uniqid()).'.'.$imageType;
            /* If image name available then use that  */
            if (!empty($imageName)) :
                $storeAt = $path.$imageName.'.'.$imageType;
            endif;
            $decodedString = base64_decode($stringPieces[1]);
            file_put_contents($storeAt, $decodedString);

            echo "<a href='" . $storeAt . "' target='_blank'>" . explode("images/", $storeAt)[1] . "</a><br />";
        endif;
    }

    // Calling function auto generate unique name
    convertBase64ToImage($data, 'images/');
    // Calling function with predefined image name
    convertBase64ToImage($data, 'images/', 'my-image');