<- Vector ----------------------------------------------------------------------
The Vector class handles x, y, z and w coordinates. w being optional, is an
homogeneous coordinate to facilite calculation.
And optionally a color being an instance of the Color class.
All the values are set as private, see fonctions bellow to display and set.
An instance can be contructed from x, y, z value:
new Vertex( array( 'x' => 0.00, 'y' => 0.00, 'z' => 0.00 ) );
Values w and color are optional:
new Vertex( array( 'x' => 0.00, 'y' => 0.00, 'z' => 0.00,
                    'w' => 1.00, 'color' => $white) );
An instance is created whith the coordinates passed throught parameters.
Defaults values are:
0.00 for x, y and w;
1.00 for w;
new Color(array('red' = 255, 'green' => 255, 'blue' => 255));
Any other use is undefined behaviour.
The class provides the following methods :
__get($value) and __set($name, $value) are available to allow you to
display or set a new value.
---------------------------------------------------------------------- Vector ->
