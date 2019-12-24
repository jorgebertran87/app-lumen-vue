describe('Employees list', function() {
    before( function() {
        cy.visit('')
    })

    const firstEmployeeId = 'table tbody tr:first td:first div'
    const managers = '#managers'

    it('Should create a table with id employees', function() {
        cy.get('table').should('have.id', 'employees');
    })

    it('Should list the first employee with id 10001', function() {
        cy.get(firstEmployeeId).should('contain', '10001');
    })

    it('Should list the first employee with id 10021 when click on second page', function() {
        const secondPage = '.page-link:eq(3)'
        cy.get(secondPage).click().then(() => {
            cy.get(firstEmployeeId).should('contain', '10021');
        })
    })

    it('Should list an empty list when the manager selected is Margareta Markovitch', function() {
        cy.get(managers).select('110022').then(() => {
            cy.get(firstEmployeeId).should('not.exist');
        })
    })

    it('Should list the first employee with id 10017 when the manager selected is Vishwani Minakawa', function() {
        cy.get(managers).select('110039').then(() => {
            cy.get(firstEmployeeId).should('contain', '10017');
        })
    })
})
