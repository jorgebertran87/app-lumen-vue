Feature: get employees
  In order to get the employees
  I need to be able to list them

  Scenario: List 5 employees from page 1
    When I request "employees?page=1&rows=5"
    Then the response code is 200
    Then the response body is:
      """
      {"data":[{"id":"10001","birthDate":"1953-09-02","firstName":"Georgi","lastName":"Facello","gender":"M","hireDate":"1986-06-26"},{"id":"10002","birthDate":"1964-06-02","firstName":"Bezalel","lastName":"Simmel","gender":"F","hireDate":"1985-11-21"},{"id":"10003","birthDate":"1959-12-03","firstName":"Parto","lastName":"Bamford","gender":"M","hireDate":"1986-08-28"},{"id":"10004","birthDate":"1954-05-01","firstName":"Chirstian","lastName":"Koblick","gender":"M","hireDate":"1986-12-01"},{"id":"10005","birthDate":"1955-01-21","firstName":"Kyoichi","lastName":"Maliniak","gender":"M","hireDate":"1989-09-12"}],"rows":300024}
      """

  Scenario: List 5 employees from page 2
    When I request "employees?page=2&rows=5"
    Then the response code is 200
    Then the response body is:
      """
      {"data":[{"id":"10006","birthDate":"1953-04-20","firstName":"Anneke","lastName":"Preusig","gender":"F","hireDate":"1989-06-02"},{"id":"10007","birthDate":"1957-05-23","firstName":"Tzvetan","lastName":"Zielinski","gender":"F","hireDate":"1989-02-10"},{"id":"10008","birthDate":"1958-02-19","firstName":"Saniya","lastName":"Kalloufi","gender":"M","hireDate":"1994-09-15"},{"id":"10009","birthDate":"1952-04-19","firstName":"Sumant","lastName":"Peac","gender":"F","hireDate":"1985-02-18"},{"id":"10010","birthDate":"1963-06-01","firstName":"Duangkaew","lastName":"Piveteau","gender":"F","hireDate":"1989-08-24"}],"rows":300024}
      """

  Scenario: List employees in page for manager Margareta Markovitch and date 01/01/2019
    When I request "employees?page=1&rows=5&mid=110022&date=2019-01-01"
    Then the response code is 200
    Then the response body is:
      """
      {"data":[],"rows":0}
      """

  Scenario: List 5 employees in page for manager Vishwani Minakawa and date 01/01/2019
    When I request "employees?page=1&rows=5&mid=110039&date=2019-01-01"
    Then the response code is 200
    Then the response body is:
      """
      {"data":[{"id":"10017","birthDate":"1958-07-06","firstName":"Cristinel","lastName":"Bouloucos","gender":"F","hireDate":"1993-08-03"},{"id":"10058","birthDate":"1954-10-01","firstName":"Berhard","lastName":"McFarlin","gender":"M","hireDate":"1987-04-13"},{"id":"10140","birthDate":"1957-03-11","firstName":"Yucel","lastName":"Auria","gender":"F","hireDate":"1991-03-14"},{"id":"10228","birthDate":"1953-04-21","firstName":"Karoline","lastName":"Cesareni","gender":"F","hireDate":"1991-08-26"},{"id":"10239","birthDate":"1955-03-31","firstName":"Nikolaos","lastName":"Llado","gender":"F","hireDate":"1995-05-08"}],"rows":14842}
      """

  Scenario: Get employee info for Cristinel Bouloucos
    When I request "employees/10017"
    Then the response code is 200
    Then the response body is:
      """
      {"id":"10017","birthDate":"1958-07-06","firstName":"Cristinel","lastName":"Bouloucos","gender":"F","hireDate":"1993-08-03","departments":[{"department":"Marketing","from":"1993-08-03","to":"9999-01-01"}],"salaries":[{"salary":"996.51","from":"2002-08-01","to":"9999-01-01"}],"titles":[{"title":"Staff","from":"2002-08-01","to":"9999-01-01"}]}
      """