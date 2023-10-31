<?
use LdapRecord\Connection;

$connection = new Connection([
    // Mandatory Configuration Options
    'hosts'            => ['10.46.22.252'],
    'base_dn'          => 'dc=dcsead-am,dc=local',
    'username'         => 'cn=DCSEAD-AM\delciane.pinheiro',
    'password'         => 'Delciane123!',

    // Optional Configuration Options
    'port'             => 389,
    'use_ssl'          => false,
    'use_tls'          => false,
    'use_sasl'         => false,
    'version'          => 3,
    'timeout'          => 5,
    'follow_referrals' => false,

    // Custom LDAP Options
    'options' => [
        // See: http://php.net/ldap_set_option
        LDAP_OPT_X_TLS_REQUIRE_CERT => LDAP_OPT_X_TLS_HARD
    ],
    
    // See: https://www.php.net/manual/en/function.ldap-sasl-bind.php
    'sasl_options' => [
        'mech' => null,
        'realm' => null,
        'authc_id' => null,
        'authz_id' => null,
        'props' => null,
    ],
]);

