const sum = require("./sum");

beforeEach(() => {
    // Initialization before each test
});

afterEach(() => {
    // Cleanup after each test
});

beforeAll(() => {});

afterAll(() => {});

describe("sum module", () => {
    test("adds 1 + 2 to equal 3", () => {
        expect(sum(1, 2)).toBe(3);
    });
});

test("object assignment", () => {
    const data = { one: 1 };
    data["two"] = 2;
    expect(data).toEqual({ one: 1, two: 2 });
});

test("the data is peanut butter", async () => {
    const data = await fetchData();
    expect(data).toBe("peanut butter");
});

test("mock function", () => {
    const mockFn = jest.fn();
    mockFn();
    expect(mockFn).toHaveBeenCalled();
});

function fetchData() {
    return "peanut butter";
}
