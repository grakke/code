package com.example.syntax;

import java.util.*;

public class Collection {

    public static void main(String[] args) {
        List();
        Vector();
        Map();
    }

    public static void List() {
        // Iterable 接口
        List<String> arrayList = new ArrayList<String>();
        arrayList.add("cxuan");

        for (String s : arrayList) {
            System.out.println(s);
        }
        for (Iterator it = arrayList.iterator(); it.hasNext(); ) {
            System.out.println(it.next());
        }
    }

    public static void Vector() {
        // initial size is 3, increment is 2
        Vector v = new Vector(3, 2);
        System.out.println("Initial size: " + v.size() + ", Initial capacity: " + v.capacity());

        v.addElement(1);
        v.addElement(2);
        v.addElement(3);
        v.addElement(4);
        System.out.println("Capacity after four additions: " + v.capacity());

        v.addElement(5.45);
        System.out.println("Current capacity: " + v.capacity());
        v.addElement(6.08);
        v.addElement(7);
        System.out.println("Current capacity: " + v.capacity());
        v.addElement(9.4f);
        v.addElement(10);
        System.out.println("Current capacity: " + v.capacity());
        v.addElement(11);
        v.addElement(12);


        System.out.println("First element: " + (Integer) v.firstElement());
        System.out.println("Last element: " + (Integer) v.lastElement());
        if (v.contains(3)) System.out.println("Vector contains 3.");

        // enumerate the elements in the vector.
        Enumeration vEnum = v.elements();
        System.out.println("\nElements in vector:");
        while (vEnum.hasMoreElements()) System.out.print(vEnum.nextElement() + " ");
        System.out.println();

        // 1、推荐使用的Iterator对象，迭代输出！
        Iterator it = v.iterator();
        while (it.hasNext()) {
            System.out.println("迭代输出：" + it.next());
        }

        // 2、对集合进行fore循环！
        // for (Integer str : v) {
        //     System.out.println("fore集合迭代输出：" + str);
        // }

        // 3、for循环迭代，在for方法体内部实例化Iterator对象！
        int i = 0;// for方法体内定义项不能出现多种不同类型
        for (Iterator iter = v.iterator(); i < v.size(); i++) {
            System.out.println("for循环迭代实例化输出：" + iter.next());
        }

        // 4、先将集合转换为数组，再利用数组的遍历输出；
        Object[] o = v.toArray();
        for (Object object : o) {
            System.out.println("转换数组迭代输出：" + object);
        }
    }

    public static void Map() {
        Map<String, String> map = new HashMap<String, String>();
        map.put("1", "value1");
        map.put("2", "value2");
        map.put("3", "value3");

        //第一种：普遍使用，二次取值
        System.out.println("通过Map.keySet遍历key和value：");
        for (String key : map.keySet()) {
            System.out.println("key= " + key + " and value= " + map.get(key));
        }

        //第二种
        System.out.println("通过Map.entrySet使用iterator遍历key和value：");
        Iterator<Map.Entry<String, String>> it = map.entrySet().iterator();
        while (it.hasNext()) {
            Map.Entry<String, String> entry = it.next();
            System.out.println("key= " + entry.getKey() + " and value= " + entry.getValue());
        }

        //第三种：推荐，尤其是容量大时
        System.out.println("通过Map.entrySet遍历key和value");
        for (Map.Entry<String, String> entry : map.entrySet()) {
            System.out.println("key= " + entry.getKey() + " and value= " + entry.getValue());
        }

        //第四种
        System.out.println("通过Map.values()遍历所有的value，但不能遍历key");
        for (String v : map.values()) {
            System.out.println("value= " + v);
        }
    }
}
