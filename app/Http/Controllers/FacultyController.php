<?php

namespace App\Http\Controllers;

use App\User;
use App\Classes;
use App\ClassInfo;
use App\ClassMemberships;
use App\Http\Controllers\Controller;


class FacultyController extends Controller {

    public function getClasses($email){
        $user = User::email($email)->first();

        $classes = ClassMemberships::membersId($user->user_id)
            ->instructorRole()
            ->pluck('classes_id')
            ->toArray();

        $results = Classes::classesId($classes)
            ->get()
            ->toArray();

<<<<<<< HEAD
        $size = count($results);

        return $this->jsonResponse($results, $size);
=======
            array_push($results, $temp);
        }
        $size = count($results);

        return $this->jsonResponse($results, $size);
    }

    public function getClassesWithTerm($term, $email){
      $user = User::email($email)->first();
      $classes = ClassMemberships::membersId($user->user_id)
          ->instructorRole()
          ->pluck('classes_id');

      $data = [];
      foreach($classes as $class){
        $temp = Classes::classesId($class)
        ->termId($term)
        ->first();
        if($temp != null){
          array_push($data, $temp);
        }
      }
      $size = count($data);
      return $this->jsonResponse($data, $size);
>>>>>>> MEM-7
    }

    public function getClassesWithTerm($term, $email){
      $user = User::email($email)->first();
      $classes = ClassMemberships::membersId($user->user_id)
          ->instructorRole()
          ->where('term_id', $term)
          ->pluck('classes_id')
          ->toArray();

      $data = Classes::classesId($classes)->get()->toArray();

<<<<<<< HEAD
      $size = count($data);
      return $this->jsonResponse($data, $size);
    }
=======
>>>>>>> MEM-7
}
