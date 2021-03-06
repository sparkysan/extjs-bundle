describe('Direct Generator', function () {
    it('Test Direct Remoting exist', function() {
        expect(Test.TestBundle).toBeDefined();
        expect(Test.TestBundle.Test.test).toBeDefined();
    });
    it('Execute test Remoting method', function() {
        var value = "";
        Test.TestBundle.Test.test(function(data) {
            value = data;
        });
        waitsFor(function() {
            return (value != "")
        }, "The Value should be set", 2000);
        runs(function() {
            expect(value['result']).toBe('test');
        });
    });
    it('Execute test Remoting method with parameter', function() {
        var value = "";
        Test.TestBundle.Test.test2("asd", function(data) {
            value = data;
        });
        waitsFor(function() {
            return (value != "")
        }, "The Value should be set", 2000);
        runs(function() {
            expect(value['result']).toBe('asd');
        });
    });
});