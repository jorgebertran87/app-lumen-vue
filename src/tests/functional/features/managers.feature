Feature: get managers
  In order to get the managers
  I need to be able to list them

  Scenario: List managers
    When I request "managers"
    Then the response code is 200
    Then the response body is:
      """
      [{"id":"110022","firstName":"Margareta","lastName":"Markovitch"},{"id":"110039","firstName":"Vishwani","lastName":"Minakawa"},{"id":"110085","firstName":"Ebru","lastName":"Alpin"},{"id":"110114","firstName":"Isamu","lastName":"Legleitner"},{"id":"110183","firstName":"Shirish","lastName":"Ossenbruggen"},{"id":"110228","firstName":"Karsten","lastName":"Sigstam"},{"id":"110303","firstName":"Krassimir","lastName":"Wegerle"},{"id":"110344","firstName":"Rosine","lastName":"Cools"},{"id":"110386","firstName":"Shem","lastName":"Kieras"},{"id":"110420","firstName":"Oscar","lastName":"Ghazalie"},{"id":"110511","firstName":"DeForest","lastName":"Hagimont"},{"id":"110567","firstName":"Leon","lastName":"DasSarma"},{"id":"110725","firstName":"Peternela","lastName":"Onuegbe"},{"id":"110765","firstName":"Rutger","lastName":"Hofmeyr"},{"id":"110800","firstName":"Sanjoy","lastName":"Quadeer"},{"id":"110854","firstName":"Dung","lastName":"Pesch"},{"id":"111035","firstName":"Przemyslawa","lastName":"Kaelbling"},{"id":"111133","firstName":"Hauke","lastName":"Zhang"},{"id":"111400","firstName":"Arie","lastName":"Staelin"},{"id":"111534","firstName":"Hilary","lastName":"Kambil"},{"id":"111692","firstName":"Tonny","lastName":"Butterworth"},{"id":"111784","firstName":"Marjo","lastName":"Giarratana"},{"id":"111877","firstName":"Xiaobin","lastName":"Spinelli"},{"id":"111939","firstName":"Yuchang","lastName":"Weedman"}]
      """