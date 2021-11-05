<?php

namespace App\Constants;

class ApiEndpoint
{
    public static $notif                       = "/api/user/notification";
    public static $read_notif                  = "/api/user/notification/read";

    // Auth
    public static $loginProcess                 = "/api/auth/login?role=student";
    public static $registerProcess              = "/api/auth/register";
    public static $changePassword               = "/api/auth/change-password";
    public static $forgetPassword               = "/api/auth/forget-password";
    public static $verifyMail                   = "/api/auth/verify-mail";
    public static $logout                       = "/api/auth/logout";

    //User
    public static $profil                       = "/api/user/detail";
    public static $update_profil                = "/api/user/update";
    public static $update_password              = "/api/user/change-password";
    public static $histori                      = "/api/user/subs";
    public static $info                         = "/api/setting";
    public static $testimoni                         = "/api/admin/testimoni";

    // Home
    public static $homeone                      = "/api/home/web";
    public static $home                         = "/api/home";

    // Search
    public static $search                       = '/api/home/search';

    // Class
    public static $class                        = '/api/classroom';
    public static $classHistory                 = '/api/classroom/registered';
    public static $classByCategory              = '/api/classroom/category';
    public static $classDetail                  = '/api/classroom/detail';
    public static $classDetailVideo             = '/api/classroom/detail/video';
    public static $classDetailQuiz              = '/api/classroom/detail/quiz';
    public static $classVideoEnding              = '/api/classroom/student-video';
    public static $classQuizEnding              = '/api/classroom/student-quiz';
    public static $classDetailVideoMore         = '/api/classroom/detail/more';
    public static $classDetailVideoTask         = '/api/classroom/detail/task';
    public static $classDetailVideoShadowing    = '/api/classroom/detail/shadowing';
    public static $classDetailMentor            = '/api/classroom/mentor';
    public static $classLikeQna                 = '/api/qna/like';
    public static $classShadowing               = '/api/classroom/detail/shadowing';

    // Qna
    public static $qna                          = '/api/qna';
    public static $qnauser                      = '/api/qna/posting';
    public static $qnaByVideo                   = '/api/qna/video';
    public static $qnaPostByVideo               = '/api/qna/post';
    public static $qnaPostByTheme               = '/api/qna/theme';
    public static $qnapost                      = '/api/qna/post';
    public static $qnadetail                    = '/api/qna/detail';
    public static $qnacomment                   = '/api/qna/comment';
    public static $qnalike                      = '/api/qna/like';
    public static $qnaalertpost               = '/api/qna/post/alert';
    public static $qnaalert                   = '/api/qna/comment/alert';

    // Forum
    public static $forum                        = '/api/forum';
    public static $forumuser                    = '/api/forum/posting';
    public static $qnafilter                    = '/api/qna/theme';
    public static $forumpost                    = '/api/forum/post';
    public static $forumalertpost               = '/api/forum/post/alert';
    public static $forumtopik                   = '/api/forum/latest';
    public static $forumdetail                  = '/api/forum/detail';
    public static $forumcomment                 = '/api/forum/comment';
    public static $forumalert                   = '/api/forum/comment/alert';
    public static $forumlike                    = '/api/forum/like';

    //pembayaran
    public static $packet                       = '/api/user/packet';
    public static $subsdetail                   = '/api/user/subs/detail';
}
