<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Response;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Exceptions\TokenBlacklistedException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        if($exception instanceOf TokenBlacklistedException){
            return Response(['error' => 'Токен блоклогдогдсон байна. Тиймээс Асуулт нэмэх боломжгүй.'], Response::HTTP_BAD_REQUEST);
        } elseif($exception instanceOf TokenInvalidException){
            return Response(['error' => 'Токен буруу байна. Тиймээс Асуулт нэмэх боломжгүй.'], Response::HTTP_BAD_REQUEST);
        }elseif ($exception instanceOf TokenExpiredException) {
            return Response(['error' => 'Токен хугацаа дууссан байна. Тиймээс Асуулт нэмэх боломжгүй.'], Response::HTTP_BAD_REQUEST);
        } elseif ($exception instanceOf JWTException) {
            return Response(['error' => 'Токен өгөгдөөгүй байна. Тиймээс Асуулт нэмэх боломжгүй.'], Response::HTTP_BAD_REQUEST);
        }
        return parent::render($request, $exception);
    }
}
