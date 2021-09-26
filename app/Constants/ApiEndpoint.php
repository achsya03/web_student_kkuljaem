<?php

namespace App\Constants;

class ApiEndpoint
{
    // Auth
    public static $loginProcess                 = "/api/auth/login";
    public static $registerProcess              = "/api/auth/register";

    // Home
    public static $homeone                      = "/api/home/web";
    public static $home                         = "/api/home";
    public static $word                         = "/api/home/word";
    public static $populer                      = "/api/forum/latest?token=0001";

    // Search
    public static $search                       = '/api/home/search';

    // Class
    public static $class                        = '/api/classroom';    
    public static $classHistory                 = '/api/classroom/registered';
    public static $classByCategory              = '/api/classroom/category';
    public static $classDetail                  = '/api/classroom/detail';
    public static $classDetailVideo             = '/api/classroom/detail/video';
    public static $classDetailQuiz              = '/api/classroom/detail/quiz';
    public static $classDetailVideoMore         = '/api/classroom/detail/more';
    public static $classDetailVideoTask         = '/api/classroom/detail/task';
    public static $classDetailVideoShadowing    = '/api/classroom/detail/shadowing';
    public static $classDetailMentor            = '/api/classroom/mentor';

    // Qna
    public static $qna                          = '/api/qna';
    public static $qnaByVideo                   = '/api/qna/video';
    
    // Forum
    public static $forum                        = '/api/forum';
    public static $forumuser                    = '/api/forum/posting';


}
