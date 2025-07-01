from behave import given, when, then


class Calculator:
    def __init__(self):
        self.result = 0

    def add(self, a, b):
        self.result = a + b
        return self.result


@given('我有一个计算器')
def step_impl(context):
    context.calculator = Calculator()


@when('我计算 {a:d} + {b:d}')
def step_impl(context, a, b):
    context.result = context.calculator.add(a, b)


@then('结果应该是 {expected:d}')
def step_impl(context, expected):
    assert context.result == expected
