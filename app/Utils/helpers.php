<?php
 function  getError()
{
   
   return response()->json([
      'error' => $validator->errors()
  ], 400);


}