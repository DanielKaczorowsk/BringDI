<?php
namespace src\Container\Enum;

    enum ClassEnum:string
    {
       
        case FactoryContainer = 'FactoryContainer';
        case GlobalCache = 'GlobalCache';
        case Director = 'Director';
        case EnumBuilder = 'EnumBuilder';
        case CallableBuilder = 'CallableBuilder';
        case ArrayBuilder = 'ArrayBuilder';
        case AutoWireBuilder = 'AutoWireBuilder';
        case LazyProxyBuilder = 'LazyProxyBuilder';
        case MethodBuilder = 'MethodBuilder';
        case PropertyBuilder = 'PropertyBuilder';
        case ContainerHandlerReflection = 'ContainerHandlerReflection';
        case ContainerHandler = 'ContainerHandler';
        case EnvService = 'EnvService';
        case EnvParser = 'Praser';
        case EnvFactory = 'Factory';
        case FileBuilder = 'FileBuilder';
        case RedisBuilder = 'RedisBuilder';
        case LoadInt = 'LoadInt';
        case LoadFloat = 'LoadFloat';
        case LoadArray = 'LoadArray';
        case LoadBoolean = 'LoadBoolean';
        case LoadBracket = 'LoadBracket';
        case LoadString = 'LoadString';
        case EnvHandler = 'EnvHandler';
    }
