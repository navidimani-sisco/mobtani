// افزودن تابع 'شامل بودن' به کلاس آرایه
Array.prototype.contains = function ( item ) {
   for (i in this) {
       if (this[i] == item) return true;
   }
   return false;
}