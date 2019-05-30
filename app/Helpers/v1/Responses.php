<?php

namespace App\Helpers\v1;


class Responses {

    public function success($args=[])
    {
     return response()->json([
        'HTTP_STATUS_CODE' => '200',
        'STATUS' => 'OK',
        'REMARKS' => $args
        ]);
    }

    public function bad_request($args=[])
    {
     return response()->json([
        'HTTP_STATUS_CODE' => '400',
        'STATUS' => 'Bad Request',
        'REMARKS' => $args
        ]);
    }

    public function internal_server_error($err="")
    {
        return response()->json([
        'HTTP_STATUS_CODE' => '406',
        'STATUS' => 'Internal Server Error',
        'ERROR' => $err
        ]);
    }

    public function created($args=[])
    {
     return response()->json([
        'HTTP_STATUS_CODE' => '201',
        'STATUS' => 'Created',
        'REMARKS' => $args
        ]);
    }

    public function accepted($args=[])
    {
     return response()->json([
        'HTTP_STATUS_CODE' => '202',
        'STATUS' => 'Accepted',
        'REMARKS' => $args
        ]);
    }



}
