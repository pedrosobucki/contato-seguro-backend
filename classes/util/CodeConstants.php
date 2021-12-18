<?php

namespace Util;

abstract class CodeConstants{
  
    /* REQUESTS */
    public const TYPE_REQUEST = ['GET', 'POST', 'DELETE', 'PUT'];
    public const TYPE_GET = ['USER', 'COMPANY'];
    public const TYPE_POST = ['USER', 'COMPANY'];
    public const TYPE_DELETE = ['USER', 'COMPANY'];
    public const TYPE_PUT = ['USER', 'COMPANY'];

    /* ERROSR */
    public const MSG_ERROR_TYPE_ROUTE = 'Route is not allowed!';
    public const MSG_ERROR_NONEXISTENT_RESOURCE = 'Nonexistent resource!';
    public const MSG_ERROR_GENERIC = 'An error occured during the request!';
    public const MSG_ERROR_NO_RETURN = 'No entry found!';
    public const MSG_ERROR_NOT_AFFECTED = 'No entry affected!';
    public const MSG_ERROR_EMPTY_TOKEN = 'A token must be sent!';
    public const MSG_ERROR_TOKEN_NON_AUTHORIZED = 'Non authorized token!';
    public const MSG_ERR0R_EMPTY_JSON = 'Request body cannot be empty!';

    /* SUCESSO */
    public const MSG_DELETE_SUCESS = 'Row deleted successfully!';
    public const MSG_UPDATE_SUCESS = 'Row updated successfully!';

    /* JSON RETURN */
    const TYPE_SUCESS = 'sucesso';
    const TYPE_ERROR = 'erro';

    /* MISC */
    public const YES = 'Y';
    public const TYPE = 'TYPE';
    public const RESPONSE = 'response';
}