<?php


// LDAP
namespace LDAP {

    class UserProvider
    {
        public function retreiveUserData(): array {}
    }

}

// API
namespace API {
    class UserProvider
    {
        public function retreiveUserData(): array {}
    }
}

namespace Bidon {

    use API\UserProvider as ApiUserProvider;
    use LDAP\UserProvider as LdapUserProvider; // import

    $ldapUserProvider = new LdapUserProvider();
    $apiUserProvider = new ApiUserProvider();
}